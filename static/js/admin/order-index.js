function generatePDF() {
	// Choose the element that our invoice is rendered in.
	const element = document.getElementById('hoadon');
	// Choose the element and save the PDF for our user.
	html2pdf()
		.set({
			html2canvas: { scale: 1 },
			image: { type: 'jpeg', quality: 0.95 },
			pagebreak: { mode: [ 'css', 'legacy' ] }
		})
		.from(element)
		.save('HoaDonBanHang');
}
