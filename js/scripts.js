/* Show preloader */
function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("loader-img").style.display = "none";
  document.getElementById("page").style.display = "block";
}

/* Hide preloader */
var myVar;

function preloader() {
  myVar = setTimeout(showPage, 400);
}

/* Open menu */
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

/* Close menu */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}

/* Close form when clicked outside */
var modal = document.getElementById('id01');
var modal02 = document.getElementById('id02');
var modal03 = document.getElementById('id03');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modal02) {
    modal02.style.display = "none";
  }
  if (event.target == modal03) {
    modal03.style.display = "none";
  }
}

/* Radio button choice */
function ShowHideDiv() {
  var chkFirst = document.getElementById("chkFirst");
  var first = document.getElementById("first");
  var second = document.getElementById("second");
  first.style.display = chkFirst.checked ? "block" : "none";
  second.style.display = chkFirst.checked ? "none" : "block";
}

/* Scroll back button */
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("scrollbtn").style.display = "block";
    } else {
        document.getElementById("scrollbtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/* Prevent form resubmission */
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

/* Prevent Iframes */
if (window.top !== window.self) {
  window.top.location = window.self.location;
}

/* Google Translate */
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}

// File upload
var inputs = document.querySelectorAll('.inputpic');
Array.prototype.forEach.call(inputs, function(input) {
  var label	 = input.nextElementSibling, labelVal = label.innerHTML;
  input.addEventListener('change', function(e) {
    var fileName = '';
    fileName = e.target.value.split( '\\' ).pop();
    if(fileName) label.querySelector( 'span' ).innerHTML = fileName;
    else label.innerHTML = labelVal;
  });
});
