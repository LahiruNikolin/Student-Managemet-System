<video id="vid"></video>

<input type="file" id="file-selector">

<script type="module">
	import QrScanner from '../node_modules/qr-scanner/qr-scanner.min.js';

	QrScanner.WORKER_PATH = '../node_modules/qr-scanner/qr-scanner-worker.min.js';

	
 

 
    const qrScanner = new QrScanner(document.querySelector('#vid'), result => console.log('decoded qr code:', result));
   let fileSelector=document.getElementById('file-selector');



    fileSelector.addEventListener('change', event => {
        const file = fileSelector.files[0];
        if (!file) {
            return;
        }
        QrScanner.scanImage(file)
            .then(result => setResult(fileQrResult, result))
            .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
    });


    function setResult(label, result) {
        label.textContent = result;
        camQrResultTimestamp.textContent = new Date().toString();
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
    }
    
</script>
