function createHTMLBlocks(items) {
  const container = document.getElementById("drive-content"); // Ensure there's a container in your HTML
  items.forEach(item => {
    // Determine if the item is a folder or file based on its MIME type
    const isFolder = item.mimeType === "application/vnd.google-apps.folder";

    // Create a block element
    const block = document.createElement("div");
    block.className = "drive-block";

    // Set the content of the block
    block.innerHTML = `
      <div class="drive-item">
        <h3>${item.name}</h3>
        <p>Type: ${isFolder ? "Folder" : "File"}</p>
        <p>ID: ${item.id}</p>
        ${isFolder ? `<button onclick="openFolder('${item.id}')">Open Folder</button>` : ""}
      </div>
    `;

    // Append the block to the container
    container.appendChild(block);
  });
}
