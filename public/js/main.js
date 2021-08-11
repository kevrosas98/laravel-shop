function increase(x) {
    var inputVal = x.previousElementSibling;
    inputVal.value++;
}
function decrease(x) {
    var inputVal = x.nextElementSibling;
    if (inputVal.value > 1) {
        inputVal.value--;
    }
}