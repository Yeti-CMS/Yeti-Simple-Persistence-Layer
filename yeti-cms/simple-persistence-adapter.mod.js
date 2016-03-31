(function () {
    /*global ShadowDOM*/
    /*global Messenger*/
    /*global Yeti*/
    /*global vex*/
    /*global _$*/
    /*global $*/
    
    $(document).ready(function () {
        
        // Hacky to delay this by 1000ms, but it helps if someone includes the file in the wrong place.
        setTimeout(function () {
            
            // Example implementation of a saveHTML method
            Yeti.registerGlobal('saveHTML', function () {
                $('#yetiPublishButton').addClass('yeti-hidden');
                
                var pageData = ShadowDOM.shadowDOM.main.clone().off();
                pageData.find('#yetiUnlockBuilder, .yeti, .yetiRemoveWhenSaving, script[src="/yeti-cms/loader.js"], script[src^="/yeti-cms/"]').remove();
                pageData = pageData.html();
                
                vex.dialog.prompt({
                  message: 'Please enter your password',
                  placeholder: 'Password',
                  callback: function(value) {
                    $.post('/write-file.php', { data: pageData, path: window.location.pathname, password: value }, function() {
                        Messenger().post("Page Published!");
                    });
                    
                    $.post('/write-file.php', { data: "var YetiSiteData = " + JSON.stringify(Yeti.siteData), path: '/sitedata.js', password: value  });
                    return;
                  }
                });
            });
        }, 1000); 
    });
})();