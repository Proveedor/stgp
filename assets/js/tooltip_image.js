/*
 * Image preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */

 var prevX = 0;
 var prevY = 0;
 
this.imagePreview = function(){ 
  var offsetY = 5;
  var offsetX = 5;
  $("img.preview").hover(function(e){
    $("body").append("<p id='preview' style='position: absolute;'><img class= 'my_card_list_img_preview' src='"+ this.src +"' alt='Image preview' height=50px width=auto/></p>");
    $("p#preview")
      .css("top",e.pageY + offsetY + "px")
      .css("left",e.pageX + offsetX + "px")
      .fadeIn("slow");
    },function(){
      console.log('leave');
      $("p#preview").remove();
    }); 

  $("img.preview").mousemove(function(e){
    if(e.pageY != prevY && e.pageX != prevX){
        prevY = e.pageY;
        prevX = e.pageX;
        $("p#preview").animate({ 
            top: (e.pageY + offsetY) + "px",
            left: (e.pageX + offsetX) + "px",
          }, 15 );
    }
  });     
};


// starting the script on page load
$(document).ready(function(){
  imagePreview();
});