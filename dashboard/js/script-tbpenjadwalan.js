function loadjadwal() {
	var url = "data/tbpenjadwalan/data.php";
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			document.getElementById("insert").innerHTML = data;
		}
	};
	xhttp.open("GET", url, true);
	xhttp.send();
}

function savejadwal() {
	var id = document.getElementById('id').value;
	var tanggal = document.getElementById('tanggal').value;
	var mulai = document.getElementById('mulai').value;
	var selesai = document.getElementById('selesai').value;
	var kodeguru = document.getElementById('kodeguru').value;
	var kelas = document.getElementById('kelas').value;
	var cmd = document.getElementById('simpan').value;

	var url = "data/tbpenjadwalan/func.php?id="+id+"&kodeguru="+kodeguru+"&tanggal="+tanggal+"&mulai="+mulai+"&selesai="+selesai+"&kelas="+kelas+"&cmd="+cmd;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			alert(data);
			loadjadwal();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();

  	document.getElementById('kodeguru').value = "";
	document.getElementById('tanggal').value = "";
	document.getElementById('mulai').value = "";
	document.getElementById('selesai').value = "";
	document.getElementById('kelas').value = "";

	document.getElementById('simpan').value = "save";
}

function deletejadwal(id){
	var url = "data/tbpenjadwalan/delete.php?id="+id;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadjadwal();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();
	loadjadwal();
}

function editJadwal(id, tanggal, mulai, selesai, kodeguru, kelas) {
	document.getElementById('id').value = id;
	document.getElementById('tanggal').value = tanggal;
	document.getElementById('mulai').value = mulai;
	document.getElementById('selesai').value = selesai;
	document.getElementById('kodeguru').value = kodeguru;
	document.getElementById('kelas').value = kelas;
	document.getElementById('simpan').value = "update";
}	


function clearjadwal() {
	loadTbpenjadwalan();
}
