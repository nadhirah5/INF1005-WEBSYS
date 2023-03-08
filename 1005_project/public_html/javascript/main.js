/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */


$(document).ready(function () {
    console.log("document loaded");
    // Event setup using a convenience method
    $(".img-thumbnail").click(myfunction);
});



function myfunction(pop) {
    
    //create nodelist to check if the class exists
    // if class exists, remove the previewimg
    if (document.getElementsByClassName('img-popup').length <= 0)
    {
        //creates image element as variable previewimg
        previewimg = document.createElement("img");
        
        //set the src to the same as target
        previewimg.src = pop.target.src;
        
        //replace the "small" in the src with "large"
        previewimg.src = previewimg.src.replace("small", "large");
        
        //add into the html class="img-popup" for our created img
        //CSS will latch onto the class and apply effects
        previewimg.setAttribute("class", "img-popup");
        
        //insert our new element after the clicked image.
        pop.target.insertAdjacentElement("afterend", previewimg);
    }
    
    // if class already exist, remove the previewimg variable
    else{
        previewimg.remove();
    }
};