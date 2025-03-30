gapi.load("client:auth2", initClient);

async function clientId() {
	try {
        const response = await fetch('../info.json');
        const data = await response.json();
        return data.api.id; // Return the desired value
    } catch (error) {
        console.error(error);
    }
}
function initClient() {
	let data
	gapi.client.init({
		clientId: clientId(),
		scope: "https://www.googleapis.com/auth/drive.metadata.readonly",
	}).then(() => {alert('loaded');}, erro => {console.error('fail', erro);});
}
