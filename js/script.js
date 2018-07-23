//bubble positioning

$("document").ready(function() {
    $(".slider").rangeslider();
});
$.fn.rangeslider = function(options) {
    var obj = this;
    var defautValue = obj.attr("value");
    obj.wrap("<span class='range-slider'></span>");
    obj.after("<span class='slider-container'><span class='bar'><span></span></span><span class='bar-btn'><span>0</span></span></span>");
    obj.attr("oninput", "updateSlider(this)");
    updateSlider(this);
    return obj;
};

function updateSlider(passObj) {
    var obj = $(passObj);
    var value = obj.val();
    var min = obj.attr("min");
    var max = obj.attr("max");
    var range = Math.round(max - min);
    var percentage = Math.round((value - min) * 100 / range);
    var nextObj = obj.next();
    nextObj.find("span.bar-btn").css("left", percentage + "%");
    nextObj.find("span.bar > span").css("width", percentage + "%");
    nextObj.find("span.bar-btn > span").text(percentage / 4);
};

//horizontal scrolling

document.getElementById("horizontal-scroller")
  .addEventListener('wheel', function(event) {
    if (event.deltaMode == event.DOM_DELTA_PIXEL) {
      var modifier = 1;
      // иные режимы возможны в Firefox
    } else if (event.deltaMode == event.DOM_DELTA_LINE) {
      var modifier = parseInt(getComputedStyle(this).lineHeight);
    } else if (event.deltaMode == event.DOM_DELTA_PAGE) {
      var modifier = this.clientHeight;
    }
    if (event.deltaY != 0) {
      // замена вертикальной прокрутки горизонтальной
      this.scrollLeft += modifier * event.deltaY;
      event.preventDefault();
    }
  });


//creating note



//      $( '.tabs-width' ).on( 'click', '.string', function( event ) {
//  console.log( this ); // записываем элемент, на который щёлкнули
//           $( '<div class="note note16"><div class="note-fret">1</div></div>' ).appendTo( this );
//    });
 var editor = $('.note-popup--wrapper');
var elementOfTablist;
var noteLength = 16,
    noteFret = 0,
    noteTechnique = '';
var spaceBetweenRounded = 0;


    $( '.tabs-width' ).on( 'click', function( event ) {
       elementOfTablist = $(event.target); //looking for string or note
       
        
        
        if(elementOfTablist.hasClass('note')) {
            console.log(event.target);
            elementOfTablist.remove();
        }
        else if(elementOfTablist.hasClass('note-fret')) {
            console.log(event.target.parentNode);
            elementOfTablist.parent().remove();
        }
        else if (elementOfTablist.hasClass('string')){
            console.log(event.target);
            
            editor.addClass('active');
            
            
            var parentOffset = elementOfTablist.offset();
            var relX = event.pageX - parentOffset.left,
                relY = event.pageY - parentOffset.top;
            
            var lastChild = elementOfTablist.children('.note').last();//последняя нота струны
            if(lastChildOffset != undefined || lastChild.parent().offset() != undefined ) {
                var lastChildWidth = lastChild.width();//ширина последней ноты
            var lastChildOffset = lastChild.offset();
            var childX = lastChildOffset.left - lastChild.parent().offset().left,
                childY = lastChildOffset.top  - lastChild.parent().offset().top;
            
            var spaceBetweenNoteAndClick = (relX - (childX + lastChildWidth)) / 24;
            spaceBetweenRounded = Math.floor(spaceBetweenNoteAndClick) * 24;
            } else {
                var spaceBetweenNoteAndClick = relX / 24;
            spaceBetweenRounded = Math.floor(spaceBetweenNoteAndClick) * 24;
            }
            
            
            console.log('отступ слева' + relX);
            console.log('отступ сверху' + relY);
            console.log('последний элемент');
            console.log(lastChild);
             console.log('отступ слева дочернего элемента' + childX);
            console.log('отступ сверху дочернего элемента' + childY);
            console.log(lastChildWidth);
            console.log('расстояние между кликом и правым краем последней ноты:');
            console.log(spaceBetweenNoteAndClick);
            console.log(spaceBetweenRounded);
            
        }
        console.log(elementOfTablist);
     return false;
    });

editor.on('click', function(event2) { //tracking what we clicked in note editor
                var elem = $(event2.target);
                
                if(elem.hasClass('close-img')) {
                    editor.removeClass('active');
                    $( '<div class="note note' + noteLength + ' ' + noteTechnique + '"' + 'style="margin-left: '+ spaceBetweenRounded + 'px' +'"><div class="note-fret">' + noteFret + '</div></div>' ).appendTo( elementOfTablist );
                    noteTechnique = '';
                }
                else if (elem.hasClass('note-length-btn')){
                    noteLength = event2.target.innerHTML;
                    console.log(noteLength);
                }
                else if (elem.hasClass('note-slider')){
                    noteFret = event2.target.value;
                    console.log(noteFret);
                }
                else if (elem.parent().hasClass('note-technique__ico')){
                 noteTechnique = elem.attr('alt');
                console.log(noteTechnique);
                }
                else if (elem.hasClass('note-technique__ico')){
                 noteTechnique = elem.children().attr('alt');
                console.log(noteTechnique);
                }
            });

    
