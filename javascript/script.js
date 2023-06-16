function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

let a = true;
function show_hide() {
    if (a) {
        document.getElementById("maps").style.display = "inline"
        return a = false
    } else {
        document.getElementById("maps").style.display = "none"
        return a = true
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "283px";
    setTimeout(() => {
        document.querySelector(".closebtnMenu").style.display = "block";
    }, 420)
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".closebtnMenu").style.display = "none";
}
let heading = document.querySelector('.header h1')
let newHeading = ''
if (heading != null) {
    for (let l of heading.innerHTML) {
        if (l.toLowerCase() == l) {
            newHeading += l
        } else {
            newHeading += ' ' + l
        }
    }
    heading.innerHTML = newHeading
}
// alert
function hide() {
    document.querySelector('.alert').style.display = 'none';
    clearTimeout(ms)
}
if (document.getElementById('close') != null) {
    document.getElementById('close').onclick = hide
}
let ms;

function hideAfter(s) {
    ms = setTimeout(() => hide(), s * 1000)
}
if (document.querySelector('.alert') != null) {
    hideAfter(5)
}
// end alert
/* document.querySelectorAll('.input-group-icon input').forEach(i => {
    i.onfocus = () => {
        i.removeAttribute('style')
    }
}) */
if (document.getElementById('show1') != null) {
    document.getElementById('show1').onclick = () => {
        if (document.getElementById('CurrentPassword').getAttribute('type') == 'password') {
            document.getElementById('CurrentPassword').setAttribute('type', 'text')
        } else {
            document.getElementById('CurrentPassword').setAttribute('type', 'password')
        }
    }
}
if (document.getElementById('show2') != null) {
    document.getElementById('show2').onclick = () => {
        if (document.getElementById('newPassword').getAttribute('type') == 'password') {
            document.getElementById('newPassword').setAttribute('type', 'text')
            document.getElementById('retypeNewPassword').setAttribute('type', 'text')
        } else {
            document.getElementById('newPassword').setAttribute('type', 'password')
            document.getElementById('retypeNewPassword').setAttribute('type', 'password')
        }
    }
}
/* CurrentPassword

newPassword
show2
retypeNewPassword */