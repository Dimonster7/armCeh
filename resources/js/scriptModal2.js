document.addEventListener('keyup', function(e) {
  var key = e.keyCode;
  if (key == 27) {

      document.querySelector('.modal.show').classList.remove('show');
      document.querySelector('.modal.dblock').classList.remove('dblock');
      document.querySelector('.overlay.active').classList.remove('active');
      ShowAll();
  };
}, false);


!function(e){"function"!=typeof e.matches&&(e.matches=e.msMatchesSelector||e.mozMatchesSelector||e.webkitMatchesSelector||function(e){for(var t=this,o=(t.document||t.ownerDocument).querySelectorAll(e),n=0;o[n]&&o[n]!==t;)++n;return Boolean(o[n])}),"function"!=typeof e.closest&&(e.closest=function(e){for(var t=this;t&&1===t.nodeType;){if(t.matches(e))return t;t=t.parentNode}return null})}(window.Element.prototype);

function ShowRightTask(num){
  console.log(num);
var choise1 = document.querySelectorAll(".forHide");
for (var i = 0; i < choise1.length; i++) {
  if (choise1[i].getAttribute("id")!=num) {
    choise1[i].classList.add('Hide');
  }
}
// var choise =  document.getElementById(num);
// console.log(choise);
// choise.classList.add('Hide');
}

function ShowAll(){
  var choise1 = document.querySelectorAll(".forHide");
  for (var i = 0; i < choise1.length; i++) {
    choise1[i].classList.remove('Hide');
  }
}

document.addEventListener('DOMContentLoaded', function() {

   var modalButtons = document.querySelectorAll('.js-open-modal'),
   modal2Buttons = document.querySelectorAll('.js-open-modal2'),
   overlay= document.querySelector('.js-overlay-modal'),
   overlay2 = document.querySelector('.js-overlay2-modal'),
   closeButtons = document.querySelectorAll('.close'),
   closeProgress= document.querySelectorAll('.closeProgress');
   console.log(closeButtons);


   modalButtons.forEach(function(item){

      item.addEventListener('click', function(e) {

         e.preventDefault();

         var modalId = this.getAttribute('data-modal'),
             modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');

         modalElem.classList.add('show');
         modalElem.classList.add('dblock');
         overlay.classList.add('active');

      }); // end click
   }); // end foreach

   modal2Buttons.forEach(function(item){

      item.addEventListener('click', function(e) {

         e.preventDefault();

         var modalId = this.getAttribute('data-modal'),
             modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');

         modalElem.classList.add('show');
         modalElem.classList.add('dblock');
         overlay2.classList.add('active');

      }); // end click
   }); // end foreach

   closeButtons.forEach(function(item){

      item.addEventListener('click', function(e) {
         var parentModal = this.closest('.modal');

         parentModal.classList.remove('show');
         parentModal.classList.remove('dblock');
         overlay.classList.remove('active');
         overlay2.classList.remove('active');
         ShowAll();
      });

   }); // end foreach

   overlay.addEventListener('click', function() {

           document.querySelector('.modal.show').classList.remove('show');
           document.querySelector('.modal.dblock').classList.remove('dblock');
           this.classList.remove('active');
           ShowAll();
       });

  var endwork = document.querySelector('.btn.endwork')
  endwork.addEventListener('click', function(){
    document.querySelector('.modal.show').classList.remove('show');
    document.querySelector('.modal.dblock').classList.remove('dblock');
    overlay.classList.remove('active');

    ShowAll();
  })

  // closeProgress.addEventListener('click', function(){
  //   document.querySelector('.modal.show').classList.remove('show');
  //   document.querySelector('.modal.dblock').classList.remove('dblock');
  // })
  closeProgress.forEach(function(item){

     item.addEventListener('click', function(e) {
        var parentModal = this.closest('.modal');

        parentModal.classList.remove('show');
        parentModal.classList.remove('dblock');
        overlay2.classList.remove('active');
        //overlay.classList.remove('active');
     });

  }); // end foreach

}); // end ready

    function showTasks(){

      var chek = document.getElementsByClassName("task");
      for (var k = 0; k < chek.length; k++) {
        chek[k].classList.add('Hide')
      }
      var tasks = document.getElementsByClassName("task");
      for (var k = 0; k < chek.length; k++) {
        tasks[k]=chek[k];
      }
      var department = document.getElementById("department");
      for(i=0; i<tasks.length; i++){

        if (tasks[i].classList.contains(department.value)) {
          console.log(tasks[i].classList);
          tasks[i].classList.remove("Hide")
          }

      }

      tableToJson();
    }
