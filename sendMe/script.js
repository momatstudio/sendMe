const acceptWorkBtn = document.getElementById("accept-work"),
  taskContent = document.getElementById("task-content"),
  taskerSection = document.getElementById("tasker-section"),
  cancelTaskerSection = document.getElementById("cancel-tasker-section"),
  services = document.getElementById("services"),
  ulHover = document.getElementById("ul-hover");

acceptWorkBtn.addEventListener("click", () => {
  myStyle = {
    opacity: (taskContent.style.opacity = "20%"),
    display: (taskerSection.style.display = "block"),
  };
  return myStyle;
});

cancelTaskerSection.addEventListener("click", () => {
  myStyle = {
    opacity: (taskContent.style.opacity = "100%"),
    display: (taskerSection.style.display = "none"),
  };
  return myStyle;
});

services.addEventListener("click", () => {
  console.log("clicked");
});
