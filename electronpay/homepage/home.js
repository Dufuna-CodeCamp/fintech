const navToggleBtn = document.querySelector(".nav-toggler");
const listContainer = document.querySelector(".menu-nav");
const navList = document.querySelector(".menu-nav__list");
const year = document.querySelector("#year");

/******* THIS AUTOMATICALLY UPDATES THE YEAR IN THE FOOTER EVERY NEW YEAR *******/
year.innerHTML = new Date().getFullYear();

/******* THIS TAKES CARE OF NAVLIST AND LISTCONTAINER HEIGHT CONTROL ON TOGGLE  *******/
navToggleBtn.addEventListener("click", function(){
    const listContainerHeight = listContainer.getBoundingClientRect().height;
    const navListHeight = navList.getBoundingClientRect().height +70;
    console.log(listContainerHeight);
    if(listContainerHeight <= 40){
        listContainer.style.height = `${navListHeight}px`;
    } else {
        listContainer.style.height = 0;
    }
})