window.onload = function () {
  //définitions
  var canvas = document.getElementById("Hello-Cannelle-canvas");
  var context = canvas.getContext("2d");


  //draw perpendicular lines
  context.beginPath();
  context.strokeStyle = "#f9eee8";
  context.lineWidth = 3;
  context.moveTo(25, 220);
  context.lineTo(25, 570);
  context.lineTo(215, 570);
  context.stroke();


  //drawing rectangle
  context.beginPath();
  context.strokeStyle = "#cccccc";
  context.lineWidth = 5;
  context.lineCap = "square";
  context.fillStyle = "#cccccc";
  context.rect(25, 25, 600, 80);
  context.stroke();
  context.fill();
  context.closePath();



  //first triangle
  context.beginPath();
  context.strokeStyle = "black";
  context.fillStyle = "#dddddd";
  context.lineWidth = 20;
  context.moveTo(200, 18);
  context.lineTo(22, 18);
  context.lineTo(200, 200);
  context.lineTo(200, 18);
  context.fill();
  context.stroke();
  context.closePath();



  // grardiant def
  var grd = context.createLinearGradient(300, 0, 300, 120);
  grd.addColorStop(0.25, "black");
  grd.addColorStop(0.75, "white");

  //second triangle
  context.beginPath();
  context.strokeStyle = grd;
  context.shadowColor = "black";
  context.shadowBlur = 30;
  context.shadowOffsetX = 5;
  context.shadowOffsetY = 5;
  context.lineWidth = 15;
  context.moveTo(280, 10);
  context.lineTo(215, 110);
  context.lineTo(350, 110);
  context.lineTo(280, 10);
  context.closePath();
  context.stroke();



  // text gradiant
  const gradient = context.createLinearGradient(242, 200, 260, 250);
  // Add 3 color stops
  gradient.addColorStop(0, "#fa15fa");
  gradient.addColorStop(0.5, "blue");
  gradient.addColorStop(1, "red");

  // drawanig text
  context.font = "50px sans-serif";
  context.fillStyle = gradient;
  context.shadowColor = "grey";
  context.shadowBlur = 3;
  context.shadowOffsetX = 1;
  context.shadowOffsetY = 2;
  context.lineWidth = 15;
  context.fillText("Hello Cannelle", 230, 190);



  //img def
  var img = new Image();
  img.src = "bear.jpg";

  //load the image after using it
  img.onload = function () {
    // draw image
    context.drawImage(img, 250, 220, 500, 300);
  };
};
