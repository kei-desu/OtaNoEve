var dlt = document.getElementById('dlt');

dlt.addEventListener("click", function() {
    window.confirm("本当に削除してよろしいですか？");
})


function Click_Sub() {
	if (document.all.div1.style.display == "block") {
		document.all.div1.style.display = "none"
	} else {
		document.all.div1.style.display = "block"
	}
}
