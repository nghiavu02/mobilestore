// Kiem tra anh logo, kich thuoc 600x600
function validateLogo(ctrl) {
	var fileUpload = ctrl;
	var regex = new RegExp('([a-zA-Z0-9s_\\.-:])+(.jpeg|.jpg|.png|.gif)$');
	if (regex.test(fileUpload.value.toLowerCase())) {
		if (typeof fileUpload.files != 'undefined') {
			var reader = new FileReader();
			reader.readAsDataURL(fileUpload.files[0]);
			reader.onload = function(e) {
				var image = new Image();
				image.src = e.target.result;
				image.onload = function() {
					var height = this.height;
					var width = this.width;
					if (height == 600 && width == 600) {
						// alert("Ảnh hợp lệ.");
						return true;
					} else {
						fileUpload.value = null;
						alert('Ảnh không đúng kích thước 600 x 600 !');
						return false;
					}
				};
			};
		} else {
			alert('Trình duyệt của bạn không hỗ trợ HTML5.');
			return false;
		}
	} else {
		alert('Hãy chọn đúng định dạng file ảnh.');
		return false;
	}
}

// Kiem tra file anh phu, kich thuoc 1200x680
function validateImg(ctrl) {
	var fileUpload = ctrl;
	var regex = new RegExp('([a-zA-Z0-9s_\\.-:])+(.jpeg|.jpg|.png|.gif)$');
	if (regex.test(fileUpload.value.toLowerCase())) {
		if (typeof fileUpload.files != 'undefined') {
			var reader = new FileReader();
			reader.readAsDataURL(fileUpload.files[0]);
			reader.onload = function(e) {
				var image = new Image();
				image.src = e.target.result;
				image.onload = function() {
					var height = this.height;
					var width = this.width;
					if (height == 680 && width == 1020) {
						// alert("Ảnh hợp lệ.");
						return true;
					} else {
						fileUpload.value = null;
						alert('Ảnh không đúng kích thước 1020 x 680 !');
						return false;
					}
				};
			};
		} else {
			alert('Trình duyệt của bạn không hỗ trợ HTML5.');
			return false;
		}
	} else {
		alert('Hãy chọn đúng định dạng file ảnh.');
		return false;
	}
}
