<script>
/* builds text to be shared by sharebutton. If an element on the page has the "pagetitle" attribute, it uses that text + the URL, otherwise it just uses the URL. */
var url = window.location.href;

if (document.getElementById("pagetitle"))  {
var title = document.getElementById("pagetitle").textContent + " ";
} else {
var title = "";}

title += url ;

/* Puts the text to share in a hidden text field */

document.getElementById("sharebutton").value = title;
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("sharebutton");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied: " + copyText.value);
}

/* "Like button" - displays a message, with different messages if clicked multiple times */
let x = 1
function likebutton() {
const y = x++
if (y == 1) {
	alert("Thank you! You have clicked this button once.");
	}
if (y > 1 && y < 11) {
	alert("Thank you! You have clicked this button " + y + " times.");
	}
if (y > 10 && y < 16) {
	alert("Wow! You REALLY like this page! Thank you so much!");
	}
if (y == 15) {
	alert("?button malfunction");
	}
}
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showForm() {
document.getElementById("replyform").classList.toggle("show");
window.scrollBy(0, 200);
}

function showIA() {
var url = window.location.href;
window.location.href = "https://web.archive.org/save/" + url;
alert("Saving page to Wayback Machine, this may take a moment...");
}

function dropFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

/* Remove focus from dropdown button if the user clicks it again */
/* Close the dropdown if the user clicks outside of it */

window.onclick = function(event) {
  if (event.target.matches('.dropbtn') && !document.getElementById("myDropdown").classList.contains('show')) {

  event.target.blur();
  }

  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
