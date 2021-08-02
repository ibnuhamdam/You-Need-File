function CheckWidth(x) {
  if (x.matches) {
    document.body.style.display = 'block';
    console.log('block');
  } else {
    document.body.style.display = 'none';
    console.log('none');
  }
}
var x = window.matchMedia('(max-width: 800px)');

CheckWidth(x);
x.addListener(CheckWidth);
