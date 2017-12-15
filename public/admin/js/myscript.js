$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

$("div.alert").delay(5000).slideUp();

function xacnhanxoa (msg) {
	if(window.comfirm(msg)) {
		return true;
	}
	else {
		return false;
	} 
}

$(document).ready(function() {
    $("#addBieumau").click(function () {
		$("#insert").append('<div class="form-group"><input type="file" name="editbm[]"></div>');
	});
});

$(document).ready(function() {
	$("a#del-bieumau").on('click',function() {
		var url = "http://localhost:8080/phucvu1/admin/TTHC/del_bieumau/";
		var _token = $("form[name='frmEditBaiviet']").find("input[name='_token']").val();
		var idBieumau = $(this).parent().find("a").attr("idBieumau");
		var bm = $(this).parent().find("a").attr("href");
		var rid = $(this).parent().find("a").attr("id");
		$.ajax({
			url: url + idBieumau,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idBieumau":idBieumau,"urlBieumau":bm},
			success: function(data) {
				if(data == "Oke") {
					$("#"+rid).remove();
				} else {
					alert("Có lỗi trong quá trình xóa !");
				}
			}
		});
	});
});

var addNewSidebar = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //Hiển thị ảnh vừa mới upload lên
            $('#sidebar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#sidebar").show();
    }
}

var addNewBanner = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //Hiển thị ảnh vừa mới upload lên
            $('#banner').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#banner").show();
    }
}

var addNewLogo = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //Hiển thị ảnh vừa mới upload lên
            $('#logo').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#logo").show();
    }
}

var addNewIcon = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //Hiển thị ảnh vừa mới upload lên
            $('#icon').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#icon").show();
    }
}

$(document).ready(function() {
    $("#theloai").change(function() {
        var idTheLoai = $(this).val();
        $.get("http://localhost:8080/phucvu1/admin/ajax/loaitin/"+idTheLoai,function(data){
            $("#loaitin").html(data);
        });
    });
});

$(document).ready(function() {
    $("#theloaiTTHC").change(function() {
        var idTheLoai = $(this).val();
        $.get("http://localhost:8080/phucvu1/admin/ajax/loaitinTTHC/"+idTheLoai,function(data){
            $("#loaitinTTHC").html(data);
        });
    });
});