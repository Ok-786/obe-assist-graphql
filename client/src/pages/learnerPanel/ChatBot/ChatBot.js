import React, { useEffect } from 'react'

export default function ChatBot() {
    useEffect(() => {
        (function (d, m) {
            var kommunicateSettings = { "appId": "17da483d2164a1f43bf49a6aaa951ddd6", "popupWidget": true, "automaticChatOpenOnNavigation": true };
            var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
            s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
            var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
            window.kommunicate = m; m._globals = kommunicateSettings;
        })(document, window.kommunicate || {});
    }, [])

    return (
        <div></div>
    )
}