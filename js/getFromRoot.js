gapi.client.drive.files.list({
  q: "17V3mIjqrleghMVxrr6KVIiIVqOiNIXZL' in parents",
  fields: "files(id, name, mimeType)"
}).then(response => {
  const items = response.result.files;
  if (items && items.length > 0) {
    console.log("Files and Folders:", items);
    createHTMLBlocks(items); // Pass the items to the HTML function
  } else {
    console.log("No files or folders found.");
  }
});
