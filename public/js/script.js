function previewImage() {
	const sampul = document.querySelector('#sampul');
const imgPreview = document.querySelector('.img-preview');
const sampulLabel = document.querySelector('.input-group-text');

sampulLabel.textContent = sampul.files[0].name;

const fileSampul = new FileReader();
fileSampul.readAsDataURL(sampul.files[0]);

fileSampul.onload = function(e) {
	imgPreview.src = e.target.result;
}
}
