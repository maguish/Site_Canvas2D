class BezierCurve {
  constructor(_displayer) {
    this.displayer = _displayer;

    // Les quatre points de contrôle de la courbe
    this.startPoint = { x: 10, y: 300 };
    this.controlPoint1 = { x: 200, y: 300 };
    this.controlPoint2 = { x: 400, y: 300 };
    this.endPoint = { x: 790, y: 300 };

    this.ballPosition = { x: 400, y: 200 };
    this.ballVelocity = { vx: 0, vy: 0 };
    this.g =0.2;
    this.bounceFactor = 1;
    // Initialisation de l'affichage
    this.refresh();

    // Gestion des événements de souris
    this.selectedPoint = null;
    this.displayer.getCanvas().addEventListener("mousedown", (event) => {
      const circles = [
        this.startPoint,
        this.controlPoint1,
        this.controlPoint2,
        this.endPoint,
      ];
      for (let i = 0; i < circles.length; i++) {
        const dx = event.offsetX - circles[i].x;
        const dy = event.offsetY - circles[i].y;
        if (dx * dx + dy * dy < 25) {
          this.selectedPoint = i;
          this.displayer
            .getCanvas()
            .addEventListener("mousemove", this.movePoint);
          break;
        }
      }
    });
    this.displayer.getCanvas().addEventListener("mouseup", (event) => {
      this.selectedPoint = null;
      this.displayer
        .getCanvas()
        .removeEventListener("mousemove", this.movePoint);
    });
  }


  startAnimation() {
    this.animationInterval = setInterval(() => {
      this.updateBallPosition();
      this.refresh();
    }, 50);
  }
  // La courbe de Bézier cubique
  drawCurve() {
    this.displayer.g2d.clearRect(
      0,
      0,
      this.displayer.getCanvas().width,
      this.displayer.getCanvas().height
    );
    this.displayer.g2d.beginPath();
    this.displayer.g2d.moveTo(this.startPoint.x, this.startPoint.y);
    this.displayer.g2d.bezierCurveTo(
      this.controlPoint1.x,
      this.controlPoint1.y,
      this.controlPoint2.x,
      this.controlPoint2.y,
      this.endPoint.x,
      this.endPoint.y
    );
    this.displayer.g2d.strokeStyle = "yellow";
    this.displayer.g2d.stroke();
  }

  // Les cercles représentant les points de contrôle
  drawCircles() {
    this.displayer.g2d.fillStyle = "white";
    this.displayer.g2d.strokeStyle = "black";
    this.displayer.g2d.lineWidth = 1;
    const circles = [
      this.startPoint,
      this.controlPoint1,
      this.controlPoint2,
      this.endPoint,
    ];
    for (let i = 0; i < circles.length; i++) {
      this.displayer.g2d.beginPath();
      this.displayer.g2d.arc(circles[i].x, circles[i].y, 5, 0, 2 * Math.PI);
      this.displayer.g2d.fill();
      this.displayer.g2d.stroke();
    }
  }

  drawBall() {
    this.displayer.g2d.beginPath();
    this.displayer.g2d.arc(this.ballPosition.x, this.ballPosition.y, 10, 0, 2 * Math.PI);
    this.displayer.g2d.fillStyle = "red";
    this.displayer.g2d.fill();
  }

  updateBallPosition() {
    this.ballPosition.x =
    this.endPoint.x -  this.controlPoint2.x +  this.controlPoint1.x -  this.startPoint.x;
      this.ballPosition.y += this.ballVelocity.vy;
      this.ballVelocity.vy += this.g;

    // faire rebondir la balle si elle touche le sol
    if ( this.ballPosition.y > this.displayer.getCanvas().height - 10) {
      this.ballPosition.y = this.displayer.getCanvas().height - 10;
      this.ballVelocity.vy = - this.ballVelocity.vy *  this.bounceFactor;
    }
  }

  movePoint = (event) => {
    const x = event.offsetX;
    const y = event.offsetY;
    const circles = [
      this.startPoint,
      this.controlPoint1,
      this.controlPoint2,
      this.endPoint,
    ];

    if (this.selectedPoint === 0 || this.selectedPoint === 3) {
      // allow only the y-coordinate to change for start point and end point
      circles[this.selectedPoint].y = y;
      this.updateBallPosition();
      this.refresh();

    } else {
      // allow both x and y coordinates to change for control points
      circles[this.selectedPoint].x = x;
      circles[this.selectedPoint].y = y;
      this.updateBallPosition();
    }
    this.refresh();
  };


  // Rafraîchissement de l'affichage
  refresh() {
    this.displayer.g2d.clearRect(
      0,
      0,
      this.displayer.getCanvas().width,
      this.displayer.getCanvas().height
    );

    this.drawCurve();
    this.drawCircles();
    this.drawBall();
  }
  
}
