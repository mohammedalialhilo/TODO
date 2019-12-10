function showtask() {
    document.getElementById("tasks").style.display = "block";
}
let info = document.getElementById("tasks");
info.onmouseover = function() {
    document.getElementById('hidden').style.display = 'block';
}
info.onmouseout = function() {
    document.getElementById('hidden').style.display = 'none';
}