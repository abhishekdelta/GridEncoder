GridEncoder
===========

A small encryption tool I wrote in order to convert Numeric IDs into unique &amp; random Alpha-Numeric codes so as to hide the integer behind it. Usecase: When you want to expose a database index (primary key, incremental column) value to the user but don't want him to know the actual number which might reveal sensitive info like his actual user ID, then you encrypt it via Grid Encoder which ultimately generates Youtube video links like alpha-numeric code for your integer.