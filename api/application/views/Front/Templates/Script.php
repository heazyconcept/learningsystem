<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="<?php echo asset_url('js/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
<script src="<?php echo asset_url('js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?php echo asset_url('js/jquery.masonryfilter.js') ?>"></script>
<script src="<?php echo asset_url('js/jquery.countdown.js') ?>"></script>
<script src="<?php echo asset_url('js/custom.js') ?>"></script>
<script src="<?php echo asset_url('js/index.js') ?>"></script>
<script src="<?php echo asset_url('js/slick.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="<?php echo asset_url('lib/select2/js/select2.min.js') ?>"></script>
<script>

	function notificationMessage(type, title, text, footer = '') {

		swal.fire({
			type: type,
			title: title,
			text: text,
			footer: footer ? footer : ''
		})

	}
	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	function guid() {
		function s4() {
			return Math.floor((1 + Math.random()) * 0x10000)
				.toString(16)
				.substring(1);
		}
		return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
			s4() + '-' + s4() + s4() + s4();
	}
</script>