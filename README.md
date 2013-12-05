CaptiveResponse
===============

Captive Response is a web application with the purpose of delivering informational materials to and requiring an appropriate response from an organization's internal users. Combined with other single sign-on components, Captive Response can force additional user interaction during the user authentication process. Use cases include Acceptable Use Policies, training programs, and surveys.

Requirements
-------------------------
+  PHP 5.4
+  Apache
+  MySQL
+  Jasig CAS with the Unicon-developed intercept logic (to be added later)

Project Status
-------------------------
CaptiveResponse is being actively developed for Shippensburg University of Pennsylvania, with a 1.0.0 completion goal of January 2014.

See the [tentative development roadmap](https://github.com/bemosior/CaptiveResponse/wiki/Development-Roadmap-(Tentative)) for more up-to-date information.

Notes
-------------------------
Installation will be eventually be performed through a web self-install process, much like many open-source CMSs. 

All routes except the API view are currently directed to CAS for authentication.

API call example (based on current non-functional code):
```$URL-TO-INSTALL/api/CAS-USER-ID``` will return 1, while ```$URL-TO-INSTALL/api/SOME-USER``` and any other value will return 0.
