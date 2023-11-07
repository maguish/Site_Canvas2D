window.onload = function () {
  // Definitions
  var canvas = document.getElementById("paint-canvas");
  var context = canvas.getContext("2d");
  var boundings = canvas.getBoundingClientRect();

  const textInput = document.querySelector("#text-input");
  const fontSizeInput = document.querySelector("#font-size-input");
  const fontFamilySelect = document.querySelector("#font-family-select");
  const colorInput = document.querySelector("#color-input");

  // Specifications
  var fillColor = document.querySelector("#fill-color");

  context.strokeStyle = "black"; // initial brush color
  var isDrawing = false;
  toolBtns = document.querySelectorAll(".tool");
  let selectedTool = "brush";
  let selectedColor = "#000";
  let snapshot;
  let contrastValue = 1;
  let brusheWidth = 2;
  let eraserWidth = 10;

  let restore_array = [];
  let index = -1;

  //haddle the font
  var val = document.getElementById("val");
  //console.log(val.innerHTML);
  var spanM = document.getElementById("minus");
  var spanP = document.getElementById("add");
  var p_min = 5,
    p_max = 50,
    r = 0,
    new_r;

  spanM.addEventListener("click", function () {
    r = parseInt(val.innerHTML) - 1;
    if (r < p_min) {
      new_r = p_min;
    } else {
      new_r = r;
    }
    brusheWidth = new_r;
    val.innerHTML = new_r;
  });

  spanP.addEventListener("click", function () {
    r = parseInt(val.innerHTML) + 1;
    if (r > p_max) {
      new_r = p_max;
    } else {
      new_r = r;
    }
    brusheWidth = new_r;
    val.innerHTML = new_r;
  });

  // Handle background color
  var bgColor = document.getElementById("favcolor2");
  bgColor.addEventListener("input", function () {
    var color1 = bgColor.value;
  });

  function handleBG(bg, opac) {
    if (!bg) return;

    let r, g, b;
    if (bg.startsWith("#")) {
      r = parseInt(bg.slice(1, 3), 16);
      g = parseInt(bg.slice(3, 5), 16);
      b = parseInt(bg.slice(5, 7), 16);
    } else if (bg.startsWith("rgb")) {
      let rgba = bg
        .substring(bg.indexOf("(") + 1, bg.lastIndexOf(")"))
        .split(",");
      r = parseInt(rgba[0]);
      g = parseInt(rgba[1]);
      b = parseInt(rgba[2]);
    } else {
      return;
    }

    const color = `rgba(${r}, ${g}, ${b}, ${opac})`;
    context.fillStyle = color;
    context.fillRect(0, 0, canvas.width, canvas.height);
  }

  bgColor.addEventListener("input", function () {
    handleBG(bgColor.value, contrastValue);
  });

  /*// Handle contrast
 var contrast = document.querySelector(".contrast input");
 console.log(contrast.value);
 var valeur1 = document.querySelector(".contrast .valeur");

 contrast.addEventListener("input", function () {
   contrastValue = contrast.value / 100;
   //console.log(contrastValue);
   handleBG(bgColor.value, contrastValue);
  
   valeur1.innerHTML = `${contrast.value}%`;

 });*/

  //max
  var brushColor = document.getElementById("favcolor1");

  brushColor.addEventListener("input", function () {
    var color0= brushColor.value;
    selectedColor = color0;
  });

  var penColor = document.getElementById("favcolor3");

  penColor.addEventListener("input", function () {
    var color2 = penColor.value;
    selectedColor = color2;
  });

  const drawRect = (e) => {
    // if fillColor isn't checked draw a rect with border else draw rect with background
    if (!fillColor.checked) {
      // creating circle according to the mouse pointer
      return context.strokeRect(
        e.offsetX,
        e.offsetY,
        prevMouseX - e.offsetX,
        prevMouseY - e.offsetY
      );
    }
    context.fillRect(
      e.offsetX,
      e.offsetY,
      prevMouseX - e.offsetX,
      prevMouseY - e.offsetY
    );
  };

  const drawCircle = (e) => {
    context.beginPath(); // creating new path to draw circle
    // getting radius for circle according to the mouse pointer
    let radius = Math.sqrt(
      Math.pow(prevMouseX - e.offsetX, 2) + Math.pow(prevMouseY - e.offsetY, 2)
    );
    context.arc(prevMouseX, prevMouseY, radius, 0, 2 * Math.PI); // creating circle according to the mouse pointer
    fillColor.checked ? context.fill() : context.stroke(); // if fillColor is checked fill circle else draw border circle
  };

  const drawTriangle = (e) => {
    context.beginPath(); // creating new path to draw circle
    context.moveTo(prevMouseX, prevMouseY); // moving triangle to the mouse pointer
    context.lineTo(e.offsetX, e.offsetY); // creating first line according to the mouse pointer
    context.lineTo(prevMouseX * 2 - e.offsetX, e.offsetY); // creating bottom line of triangle
    context.closePath(); // closing path of a triangle so the third line draw automatically
    fillColor.checked ? context.fill() : context.stroke(); // if fillColor is checked fill triangle else draw border
  };

  const startDraw = (e) => {
    isDrawing = true;
    prevMouseX = e.offsetX; // passing current mouseX position as prevMouseX value
    prevMouseY = e.offsetY; // passing current mouseY position as prevMouseY value
    context.beginPath(); // creating new path to draw
    context.lineWidth = brusheWidth; // passing brushSize as line width
    context.strokeStyle = selectedColor; // passing selectedColor as stroke style
    context.fillStyle = selectedColor; // passing selectedColor as fill style
    snapshot = context.getImageData(0, 0, canvas.width, canvas.height);
  };

  const drawing = (e) => {
    if (!isDrawing) return; //if isDrawing is false return from here
    context.putImageData(snapshot, 0, 0); // adding copied canvas data on to this canvas

    if (selectedTool === "brush") {
      // to paint white color on to the existing canvas content else set the stroke color to selected color
      context.strokeStyle = selectedColor;
      context.lineTo(e.offsetX, e.offsetY); // creating line according to the mouse pointer
      context.stroke(); // drawing/filling line with color
      context.setLineDash([0, 0]); // remove any previously set dash pattern
    } else if (selectedTool === "eraser") {
      erase(e);
    } else if (selectedTool === "rectangle") {
      drawRect(e);
    } else if (selectedTool === "circle") {
      drawCircle(e);
    } else if (selectedTool === "triangle") {
      drawTriangle(e);
    } else if (selectedTool === "pencil") {
      pencil(e);
    } else {
      AddText(e);
    }
  };

  // Mouse Down Event
  canvas.addEventListener("mousedown", startDraw);
  // Mouse Move Event
  canvas.addEventListener("mousemove", drawing);

  // Mouse Up Event
  canvas.addEventListener("mouseup", function () {
    isDrawing = false;
    restore_array.push(context.getImageData(0, 0, canvas.width, canvas.height));
    index += 1;
    //console.log(restore_array);
  });

  // clear function
  function clear_canvas() {
    context.clearRect(0, 0, canvas.width, canvas.height);
    restore_array = [];
    index = -1;
  }
  // Handle Clear Button
  var clearButton = document.getElementById("clear");

  clearButton.addEventListener("click", function () {
    clear_canvas();
  });

  //handle erase
  var eraser = document.getElementById("eraser");
  eraser.addEventListener("click", function () {
    selectedTool = "eraser";
  });

  const erase = (e) => {
    if (selectedTool === "eraser") {
      context.strokeStyle = bgColor.value;
      context.shadowColor = bgColor.value; // make the blur color the same as the brush color

      context.lineWidth = eraserWidth;
      context.lineTo(e.offsetX, e.offsetY); // creating line according to the mouse pointer
      context.stroke();
    }
  };

  //handle pencil
  var pencilButton = document.getElementById("pencil");
  pencilButton.addEventListener("click", function () {
    selectedTool = "pencil";
  });

  const pencil = (e) => {
    if (selectedTool === "pencil") {
      context.lineWidth = brusheWidth; // passing brushSize as line width
      context.lineCap = "round"; // make the line ends rounded
      context.lineJoin = "round"; // make the line joints rounded
      context.shadowBlur = 20; // add a slight blur effe make the blur color the same as the brush color
      context.shadowColor = selectedColor;
      context.strokeStyle = selectedColor;
      context.setLineDash([0, Math.random() * 2]);
      context.lineTo(e.offsetX, e.offsetY);
      context.stroke();
    }
  };

  //handle Add text

  var textAdd = document.getElementById("text");
  textAdd.addEventListener("click", function () {
    selectedTool = "text";
  });

  const AddText = (e) => {
    if ((selectedTool = "text")) {
      const x = e.offsetX;
      const y = e.offsetY;
      const text = textInput.value;
      const fontSize = fontSizeInput.value;
      const fontFamily = fontFamilySelect.value;
      const color = colorInput.value;

      context.font = `${fontSize}px ${fontFamily}`;
      context.fillStyle = color;
      context.shadowBlur = 0; // add a slight blur effe make the blur color the same as the brush color

      context.textAlign = "left";
      context.textBaseline = "top";
      context.fillText(text, x, y);
    }
  };

  // Handle undo Button
  var undoButton = document.getElementById("undo");

  undoButton.addEventListener("click", function () {
    if (index <= 0) {
      clear_canvas();
    } else {
      index -= 1;
      restore_array.pop();
      context.putImageData(restore_array[index], 0, 0);
    }
  });
  toolBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      // adding click event to all tool option
      // removing active class from the previous option and adding on current clicked option
      document.querySelector(".options .active").classList.remove("active");
      btn.classList.add("active");
      selectedTool = btn.id;
    });
  });

// Handle Save Button
var saveButton = document.getElementById("save");
var formatSelect = document.getElementById("format");

saveButton.addEventListener("click", function () {
  var imageName = prompt("Please enter image name");
  
  // Create a new canvas with the same dimensions as the original canvas
  var newCanvas = document.createElement("canvas");
  newCanvas.width = canvas.width;
  newCanvas.height = canvas.height;
  
  // Get the 2D rendering context for the new canvas
  var newContext = newCanvas.getContext("2d");
  
  // Draw the background color of the original canvas on the new canvas
  newContext.fillStyle = getComputedStyle(canvas).backgroundColor;
  newContext.fillRect(0, 0, newCanvas.width, newCanvas.height);
  
  // Draw the image from the original canvas on the new canvas
  newContext.drawImage(canvas, 0, 0);
  
  // Get the data URL of the new canvas as a JPG image
  var canvasDataUrl = newCanvas.toDataURL("image/jpg");
  
  // Create a download link with the JPG image data
  var a = document.createElement("a");
  a.href = canvasDataUrl;
  a.download = `${imageName}.jpg`;
  
  if (imageName) {
    a.click();
  } else {
    alert("Please enter a valid image name.");
  }
});


};
