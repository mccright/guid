# Simplistic GUID/UUID generator

## About
This is a hack to address a short-term problem.  
We needed to quickly append some unique suffixes to some strings to resist hostile "guessing" or predicting of them.   
I started with a fork of Sweelix\guid for PHP.  
Sweelix\guid is a PHP 5.3+ library for creating GUIDs.

I added entropy by feeding a v4 UUID into the generation all 3 UUID types.   
I also attempted to add additional entropy to the UUID generation for v3 & v5 UUIDs by building another large input using repeated calls to mt_rand() along with a temporal component from microtime() as a nod to the rfc.

REFERENCES:  
GUID/UUID Guidance [https://www.ietf.org/rfc/rfc4122.txt](https://www.ietf.org/rfc/rfc4122.txt)  
[https://en.wikipedia.org/wiki/Universally_unique_identifier](https://en.wikipedia.org/wiki/Universally_unique_identifier) 
and [https://en.wikipedia.org/wiki/Globally_unique_identifier](https://en.wikipedia.org/wiki/Globally_unique_identifier).  
Requires class Guid.php from [https://github.com/pgaultier/guid](https://github.com/pgaultier/guid).  
