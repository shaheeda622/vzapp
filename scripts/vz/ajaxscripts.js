// For PDF Download
function DownloadPDf(ID,Type) {
    $('#ProgressPanel').show();
    $.ajax({
        type: "POST",
        url: baseURL + "/Docs/DownloadPDF",
        data: { ID: ID,Type:Type },
        success: function (data) {
            $('#ProgressPanel').hide();
         if (data.result == 'Redirect') {
            //redirecting to main page from here for the time being.
             // window.location = data.url;
             $("#dummyLink").attr("href", baseURL + data.url)
             $("#dummyLink")[0].click();
            }
        },
        error: function (e) {
            $('#ProgressPanel').hide();
        }

    });


}
// Ends here

