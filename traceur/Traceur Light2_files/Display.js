class Display {
    constructor(canvas_id, input_id) {
        this.canvas = document.getElementById(canvas_id);
        if (this.canvas.getContext) {
            this.g2d = this.canvas.getContext('2d');
        } else {
            this.canvas.write("Votre navigateur ne peut visualiser cette page correctement");
        }
        this.repere = new Repere(this.canvas.width, this.canvas.height);
        this.color = "#110000";
        this.colorAxes = "#aaaaaa";
        this.bgColor = "#FFFFFF";
        this.lineWidth = 1;
        this.createFunctions();
        this.currentFunctionIdx = 0;
        this.input = document.getElementById(input_id)
        this.input.value = this.functions[this.currentFunctionIdx].key;

        document.getElementById(input_id).addEventListener(
            "wheel",
            e => this.drawNextFunction(e)
        )
        document.getElementById(canvas_id).addEventListener(
            "wheel",
            e => this.drawNextFunction(e)
        )

        document.addEventListener(
            "click",
            e => this.startAnimation(e)
        )

        document.getElementById(input_id).addEventListener('keypress', e => {
            e = e ?? window.event;
            let keycode = e.keyCode;
            if (keycode == 13) { // enter
                this.redrawFromInput(e);
            }
        })

    }
    startAnimation(e) {
        let curve = this.getCurve();
        let animation = new Animation(curve.getNbPoints(),35);
        animation.nextStep = t => this.drawMobile(animation.step)
            
        this.g2d.beginPath();
        this.g2d.clearRect(0, 0, this.canvas.width, this.canvas.height);
        animation.run();
    }
    createFunctions() {
        this.functions = new Array();
        let i = 0;
        this.functions.push(new Courbe(i++, "sa", function (x) { return sa(x) }, false));
        this.functions.push(new Courbe(i++, "bounce", function (x) { return (rewind(bounce))(x) }, false));
        this.functions.push(new Courbe(i++, "lerp", function (x) { return x }, false));
        this.functions.push(new Courbe(i++, "sin(x)", function (x) { return Math.sin(x) }, false));
        this.functions.push(new Courbe(i++, "x^2", function (x) { return x * x }, false));
        let a = { x: 0, y: 0 }, b = { x: .7, y: 0 },
            c = { x: .3, y: 1 }, d = { x: 1, y: 1 };
        this.functions.push(new Courbe(i++, "sfs", cubic_bezier(a, b, c, d), true));
        a = { x: 0, y: 0 }; b = { x: 0, y: .5 };
        c = { x: .3, y: 1 }; d = { x: 1, y: 1 };
        this.functions.push(new Courbe(i++, "fiso", cubic_bezier(a, b, c, d), true));
        this.functions.push(new Courbe(i++, "cos(x)", function (x) { return Math.cos(x) }, false));
    }

    drawNextFunction(e) {
        if (e.deltaY > 0) this.currentFunctionIdx++;
        else this.currentFunctionIdx--;
        if (this.currentFunctionIdx >= this.functions.length)
            this.currentFunctionIdx = 0;
        else if (this.currentFunctionIdx < 0)
            this.currentFunctionIdx = this.functions.length - 1;
        this.input.value = this.functions[this.currentFunctionIdx].key;
        this.draw();
    }

    setFunction(fd) {
        let i = 0, max = this.functions.length, found = false;
        while (i < max && !found) {
            if (this.functions[i].key === fd) found = true;
            else {
                i++;
            }
        }
        if (i === max && !found) return false;
        else
            this.currentFunctionIdx = i;
        return true;
    }
    getCurve() {
        return this.functions[this.currentFunctionIdx];
    }
    redrawFromInput(e) {
        let fd = e.target.value;

        if (this.setFunction(fd)) {
            this.draw();
        } else {
            alert("La fonction que vous demandez est inconnue, essayez x^2, cos(x) ou sin(x) ou demandez à votre ingénieur préféré comment utiliser ce programme !")
        }
    }

    draw() {
        this.g2d.beginPath();
        this.g2d.strokeStyle = this.colorAxes;
        this.functions[this.currentFunctionIdx].draw(this.repere, this.g2d);
    }

    drawMobile(i) {
        this.functions[this.currentFunctionIdx].draw(this.repere, this.g2d);
        this.functions[this.currentFunctionIdx].drawMobile(i, this.repere, this.g2d);
    }
}

class Repere {
    #mark = { w: 3, h: 3 };
    #pitch = { w: 10, h: 10 };
    #model = {
        x: { min: 0, max: 1 },
        y: { min: -1, max: 1 }
    };

    constructor(w, h) {
        this.width = w;
        this.height = h;
    }

    drawAxes(cg) {
        cg.beginPath();
        cg.moveTo(0, this.height);
        cg.lineTo(this.width, this.height);
        let nbt = 1 + this.height / this.#pitch.w;
        let x = 0;
        for (let i = 0; i < nbt; i++) {
            cg.moveTo(x, this.height);
            cg.lineTo(x, this.height - this.#mark.h)
            x += this.#pitch.w;
        }

        cg.moveTo(0, this.height);
        cg.lineTo(0, 0);
        let y = 0;
        for (let i = 0; i < nbt; i++) {
            cg.moveTo(0, y);
            cg.lineTo(this.#mark.w, y)
            y += this.#pitch.h;
        }
        cg.stroke();
    }

    drawVerticalAxe(cg, x) {
        cg.beginPath();
        cg.moveTo(x, this.height);
        cg.lineTo(x, 0);
        cg.stroke();
    }

    getMinX() {
        return this.#model.x.min;
    }

    getMaxX() {
        return this.#model.x.max;
    }

    xm2p(p) {
        return this.width * (p.x - this.#model.x.min) / (this.#model.x.max - this.#model.x.min);
    }

    ym2p(p) {
        return this.height * (p.y - this.#model.y.max) / (this.#model.y.min - this.#model.y.max);
    }

    printCoords(p) {
        console.log(p.x + " (" + this.xm2p(p) + "), " + p.y + " (" + this.ym2p(p) + ")");
    }
}

class Point {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
}

class Courbe {
    fun;
    //ndvilb : n-ombre d-e v-aleurs (représentées sur l'intervalle affiché) en i-ncluant l-es b-ornes
    ndvilb = 100;
    radius = 10;

    constructor(idx, key, f, parametree) {
        this.idx = idx;
        this.key = key;
        this.fun = f;
        this.param = parametree ?? false;
        this.neverDrawn = true;
    }
    getNbPoints() {
        return this.points.length;
    }
    init(repere) {
        this.points = new Array();
        let step = (repere.getMaxX() - repere.getMinX()) / (this.ndvilb - 1);
        //console.log(step);
        let f = this.fun;
        for (let x = repere.getMinX(); x <= repere.getMaxX(); x += step) {
            let p = new Point(x, f(x), this.idt, repere);
            if (this.param) p = new Point(f(x).x, f(x).y, this.idt, repere); // cas des fonctions this.paramétrées
            this.points.push(p);
        }
    }

    draw(repere, g2d) {
        if (this.neverDrawn) {
            this.init(repere);
            this.neverDrawn = false;
        }

        g2d.beginPath();
        g2d.clearRect(0, 0, repere.width, repere.height);
        repere.drawAxes(g2d);
        g2d.strokeStyle = this.color;
        g2d.lineWidth = this.lineWidth;

        let first = true;
        this.points.forEach(p => {
            if (first) {
                g2d.moveTo(repere.xm2p(p), repere.ym2p(p));
                first = false;
            } else {
                 g2d.lineTo(repere.xm2p(p), repere.ym2p(p));
            }
        })
        g2d.stroke();

   }

    drawMobile(i, repere, g2d) {


        let previous, p = this.points[i], newP = new Point(0.5, 1 - p.y);
        g2d.beginPath();
        if (i > 0) {
            previous = new Point(this.points[i - 1].x, this.points[i - 1].y);
            //g2d.clearRect(repere.xm2p(previous) - this.radius - 1, repere.ym2p(previous) - this.radius - 1, this.radius*2 + 2, this.radius*2+2);
            g2d.clearRect(repere.xm2p(previous) - this.radius - 1,0, this.radius * 2 + 2, repere.height);
        }
        repere.drawVerticalAxe(g2d, repere.xm2p(p));
        g2d.beginPath();
        g2d.save();
 
        g2d.moveTo(repere.xm2p(p), repere.ym2p(p));      
        g2d.ellipse(repere.xm2p(p), repere.ym2p(p), this.radius , this.radius , 0, 0, 2 * Math.PI);
        
        g2d.fillStyle = "orange";
        g2d.fill();
        g2d.restore();
    }
}

function sa(x) {
    return  0.5 + 0.1 * Math.cos(20 * x) /  (x + 0.5) ;
}

function bounce(t) {
    let result;
    for (let a = 0, b = 1; 1; a += b, b /= 2) {
        
        if (t >= (7 - 4 * a) / 11) { 
            result = -Math.pow((11 - 6 * a - 11 * t) / 4, 2) + Math.pow(b, 2); 
            return result;
        }
    }    
}

function cubic_bezier(a, b, c, d) {
    return function (t) {
        return {
            x: (1 - t) * (1 - t) * (1 - t) * a.x + 3 * (1 - t) * (1 - t) * t * b.x + 3 * (1 - t) * t * t * c.x + t * t * t * d.x,
            y: (1 - t) * (1 - t) * (1 - t) * a.y + 3 * (1 - t) * (1 - t) * t * b.y + 3 * (1 - t) * t * t * c.y + t * t * t * d.y,
        }
    }
}
function quad_bezier(a, b, c) {
    return function (t) {
        return {
            x: (1 - t) *  (1 - t) * a.x + 2 * (1 - t) *  t * b.x + t * t * c.x,
            y: (1 - t) * (1 - t) * a.y + 2 * (1 - t) * t * b.y + t * t * c.y
        }
    }
}


function rewind(distortFunc) {
    return function (t) {
        return distortFunc(1 - t);
    }
}
