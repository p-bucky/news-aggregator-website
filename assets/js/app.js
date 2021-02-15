const openSidebar = () => {
    document.querySelector(".sidebar").style.width = "260px";
    document.querySelector(".sidebar").style.transition = "all 0.1s ease-in-out";
    document.querySelector(".open").style.display = "none";
    document.querySelector(".close").style.display = "block";
    document.querySelector(".sidebar-footer a").style.color = "rgb(170, 170, 170)";
    document.querySelector(".sidebar-footer p").style.color = "rgb(170, 170, 170)";
    document.querySelector(".sidebar-footer").style.borderTop = "2px solid var(--sidebar-footer-a-)";
    document.querySelector(".sidebar-footer a").style.display = "block";
    document.querySelector(".sidebar-footer p").style.display = "block";
    document.querySelector(".wfu").style.display = "block";
    document.querySelector(".wfu").style.color = "rgb(170, 170, 170)";


}
const closeSidebar = () => {
    document.querySelector(".sidebar").style.width = "60px";
    document.querySelector(".close").style.display = "none";
    document.querySelector(".open").style.display = "block";
    document.querySelector(".sidebar-footer a").style.display = "none";
    document.querySelector(".sidebar-footer p").style.display = "none";
    document.querySelector(".sidebar-footer").style.borderTop = "none";
    document.querySelector(".wfu").style.display = "none";
}