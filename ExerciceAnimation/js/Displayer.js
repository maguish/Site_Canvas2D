class Interactor {
  #line;
  #displayer;
  #info;
  #mousePressed;
  #drawing;
  #oldTime;
  #oldTimeSum;
  #averageTime;

  constructor(p_displayer, p_infoElement) {
    this.#displayer = p_displayer;
    this.#info = p_infoElement;
    this.#line = new Array();
    this.#drawing = false;
    this.#mousePressed = false;
    let c = p_displayer.getCanvas();
    c.addEventListener("mousedown", (e) => this.handlePress(e));
    c.addEventListener("mousemove", (e) => this.handleMove(e));
    c.addEventListener("mouseup", (e) => this.handleUpLeave(e));
    c.addEventListener("mouseleave", (e) => this.handleUpLeave(e));
  }

  handlePress(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    this.#mousePressed = true;
    this.#line = new Array();
    this.#oldTime = Date.now();
    this.#oldTimeSum = 0;
    //this.previousLocation = { x: e.offsetX, y: e.offsetY };
  }

  handleMove(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    if (this.#mousePressed) {
      this.#drawing = true;
      this.#mousePressed = false;
    }

    if (this.#drawing) {
      this.#line.push([e.offsetX, e.offsetY]);
      this.displayLine();
      let delta = Date.now() - this.#oldTime;
      this.#oldTime = Date.now();
      this.#oldTimeSum += delta;
      this.#averageTime = this.#oldTimeSum / this.#line.length;
      this.#info.innerHTML =
        this.#line.length +
        "<p> Time between two last moves : " +
        delta +
        "</p>\n<p>Average Time : " +
        this.#averageTime +
        "</p>";
    }
  }

  handleUpLeave(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    if (this.#mousePressed) {
      this.#displayer.init();
      this.#mousePressed = false;
    }
    if (this.#drawing) {
      this.#line.push([e.offsetX, e.offsetY]);
      this.displayLine();
      this.#drawing = false;
    }
  }

  displayLine() {
    this.#displayer.init();
    this.#line.forEach((coord, i, tab) => {
      if (i < tab.length - 1)
        this.#displayer.drawLine(
          coord[0],
          coord[1],
          tab[i + 1][0],
          tab[i + 1][1]
        );
    });
  }
}

class InteractorBall {
  #line;
  #ball;
  #displayer;
  #info;
  #mousePressed;
  #drawing;
  #oldTime;
  #oldTimeSum;
  #averageTime;

  constructor(p_ball, p_displayer, p_infoElement) {
    this.#ball = p_ball;
    this.#displayer = p_displayer;
    this.#info = p_infoElement;
    this.#line = new Array();
    this.#drawing = false;
    this.#mousePressed = false;
    let c = p_displayer.getCanvas();
    c.addEventListener("mousedown", (e) => this.handlePress(e));
    c.addEventListener("mousemove", (e) => this.handleMove(e));
    c.addEventListener("mouseup", (e) => this.handleUpLeave(e));
    c.addEventListener("mouseleave", (e) => this.handleUpLeave(e));
  }

  handlePress(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    this.#mousePressed = true;
    this.#line = new Array();
    this.#oldTime = Date.now();
    this.#oldTimeSum = 0;
    // this.previousLocation = { x: e.offsetX, y: e.offsetY };
  }

  handleMove(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    if (this.#mousePressed) {
      this.#drawing = true;
      this.#mousePressed = false;
    }
    if (this.#drawing) {
      this.#line.push([e.offsetX, e.offsetY]);
      this.displayLine();
      let delta = Date.now() - this.#oldTime;
      this.#oldTime = Date.now();
      this.#oldTimeSum += delta;
      this.#averageTime = this.#oldTimeSum / this.#line.length;
      this.#info.innerHTML =
        this.#line.length +
        "<p> Time between two last moves : " +
        delta +
        "</p>\n<p>Average Time : " +
        this.#averageTime +
        "</p>";
    }
  }

  handleUpLeave(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    if (this.#mousePressed) {
      this.#ball.x = e.offsetX;
      this.#ball.y = e.offsetY;
      this.#displayer.init();
      this.#displayer.drawBall(this.#ball);
      this.#mousePressed = false;
    }
    if (this.#drawing) {
      this.#line.push([e.offsetX, e.offsetY]);
      this.displayLine();
      this.#drawing = false;
      let a = new Animation(this.#line.length, 15);
      a.nextStep = (t) => {
        this.displayLine();
        this.#ball.setLocation(this.#line[a.step]);
        this.#displayer.drawBall(this.#ball);
      };
      a.run();
    }
  }

  displayLine() {
    this.#displayer.init();
    this.#line.forEach((coord, i, tab) => {
      if (i < tab.length - 1)
        this.#displayer.drawLine(
          coord[0],
          coord[1],
          tab[i + 1][0],
          tab[i + 1][1]
        );
    });
  }
}

//x, y = coordinates of ball center
class Ball {
  x;
  y;
  w;

  constructor(x, y, w) {
    this.x = x;
    this.y = y;
    this.w = w;
  }
  setLocation(tab) {
    this.x = tab[0];
    this.y = tab[1];
  }
}

class Displayer {
  static colors = [
    "#41566E", // bleu
    "#F44", // orange-rose
    "#FEE",
    "#C94", // marron
    "#FFF",
    "#AFF", // turquoise
    "#ffd800", // jaune
  ];

  constructor(_htmlElement) {
    this.canvas = document.createElement("canvas");
    this.canvas.setAttribute("width", 800);
    this.canvas.setAttribute("height", 600);
    _htmlElement.appendChild(this.canvas);

    if (this.canvas.getContext) {
      this.g2d = this.canvas.getContext("2d");
    } else {
      this.canvas.write(
        "Votre navigateur ne peut visualiser cette page correctement"
      );
    }

    this.wbg = Displayer.colors[0]; //  window background
    this.obg = Displayer.colors[1]; //  object background
    this.fg = Displayer.colors[2]; //  fg foreground
    this.lc = Displayer.colors[3]; //  line color
    this.lineWidth = 1;
    this.init();
  }

  getCanvas() {
    return this.canvas;
  }

  init() {
    this.g2d.clearRect(0, 0, this.canvas.width, this.canvas.height);
    this.g2d.fillStyle = this.wbg;
    this.g2d.fillRect(0, 0, this.canvas.width, this.canvas.height);
  }

  //dessin en coordonnées canvas
  drawBall(p) {
    let x = p.x,
      y = p.y,
      w = p.w;
    this.g2d.beginPath();
    this.g2d.arc(x, y, w, 0, Math.PI * 2, true);
    this.g2d.fillStyle = this.obg;
    this.g2d.fill();
    this.g2d.strokeStyle = this.fg;
    this.g2d.stroke();
  }

  // dessin ligne en coordonnées canvas
  drawLine(x1, y1, x2, y2) {
    this.g2d.strokeStyle = this.lc;
    this.g2d.beginPath();
    this.g2d.moveTo(x1, y1);
    this.g2d.lineTo(x2, y2);
    this.g2d.stroke();
  }
}
