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

import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },
});
calendar.render();