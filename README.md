Captive Response
===============

Captive Response is a web application with the purpose of delivering informational materials to and requiring an appropriate response from an organization's internal users. Combined with other single sign-on components, Captive Response can force additional user interaction during the user authentication process. Use cases include Acceptable Use Policies, training programs, and surveys.

Captive Response is currently designed for use with Jasig CAS configured with the "attributeRepository" bean.

Requirements
-------------------------
+  PHP 5.4
+  Apache
+  MySQL
+  Jasig CAS with the Unicon-developed intercept logic (to be added later)

Project Status
-------------------------
CaptiveResponse is being actively developed for Shippensburg University of Pennsylvania, with a 1.0.0 completion goal of January 2014.

See the [tentative development roadmap](https://github.com/bemosior/CaptiveResponse/wiki/Development-Roadmap) for more up-to-date information.

Notes
-------------------------
Installation will be eventually be performed through a web self-install process, much like many open-source CMSs. 

All routes except the API view are currently directed to CAS for authentication.

API call example:
```$URL-TO-INSTALL/api/identifier/membership```, where "identifier" is the principal identifier and "membership" is a comma-separated list of membership definitions. Both values are URL-encoded. Returns 1 (to say redirect the user to the CaptiveResponse portal) or 0 (to proceed as usual).
