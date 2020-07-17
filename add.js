let txtFirst = document.querySelector("#idFirst");
txtFirst.setAttribute("pattern", "[A-Za-z]{3,}");
txtFirst.setAttribute("title", "At least 3 letters");

let txtLast = document.querySelector("#idLast");
txtLast.setAttribute("pattern", "[A-Za-z]{3,}");
txtLast.setAttribute("title", "At least 3 letters");

let txtPhone = document.querySelector("#idPhone");
txtPhone.setAttribute("pattern", "[0-9]{11}");
txtPhone.setAttribute("title", "11 numbers");

let txtLocation = document.querySelector("#idLocation");
txtLocation.setAttribute("pattern", "[A-Za-z]{3,}");
txtLocation.setAttribute("title", "At least 3 letters");

let txtJob = document.querySelector("#idJob");
txtJob.setAttribute("pattern", "[A-Za-z]{3,}");
txtJob.setAttribute("title", "At least 3 letters");
