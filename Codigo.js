function generarCodigoQR(texto) {
    let qr = qrcode(0, 'L');
    qr.addData(texto);
    qr.make();
    return qr.createImgTag();
}
