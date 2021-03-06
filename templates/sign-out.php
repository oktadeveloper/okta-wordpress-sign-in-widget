<script src="https://global.oktacdn.com/okta-signin-widget/4.1.3/js/okta-sign-in.min.js" type="text/javascript"></script>
<script>
var signIn = new OktaSignIn({
    baseUrl: '<?php echo parse_url($issuer = get_option('okta-issuer-url'), PHP_URL_SCHEME).'://'.parse_url($issuer, PHP_URL_HOST) ?>',
    authParams: {
        clientId: '<?php echo get_option('okta-widget-client-id') ?>',
        display: 'page',
        issuer: '<?php echo get_option('okta-issuer-url') ?>'
    }
});

signIn.authClient.tokenManager.get('id_token')
.then(function(token){
    if(token) {
        signIn.authClient.signOut({
            idToken: token,
            postLogoutRedirectUri: '<?php echo home_url() ?>'
        });
    } else {
        window.location = '<?php echo home_url() ?>';
    }
});
</script>
