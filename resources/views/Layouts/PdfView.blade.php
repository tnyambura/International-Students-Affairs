<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="pspdfkit" style="height: 100vh"></div>
    
    <script src="pspdfkit.js" ></script>
    <script >
        console.log('{{$file}}');
        PSPDFKit.load({
            container: "#pspdfkit",
            document: "storage/extension/11111_entryPage_996322.pdf", // Add the path to your document here.
            // document: "storage/{{$file}}", // Add the path to your document here.
        })
        .then(function(instance) {
            console.log("PSPDFKit loaded", instance);
        })
        .catch(function(error) {
            console.error(error.message);
        });
        
        // PSPDFKit.load(configuration).then(async (instance) => {
        //     const annotations = await instance.getAnnotations(0);
        //     const annotation = annotations.get(0);
        //     await instance.delete(annotation);
            
        //     console.log("Annotation deleted.");
        // });
    </script>
</body>
</html>

