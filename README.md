#PredictIt-Tools#

**About PredictIt**

PredictIt (http://www.predictit.org) is an online political futures site that lets users wager on the likelihood that an event will occur or not. Users bet on outcomes by purchasing shares that answer "Yes" or "No" to specific questions (e.g. "Will Bernie Sanders be the 2016 Democratic Nominee?"). Each share costs between $0.00 and $1.00. Whatever the current price of a share might be (e.g. "$0.89") that is also considered as the relative percentage chance that the market thinks that the event will occur (i.e. "89%"). After the event occurs, users receive $1 for each share that answered the question correctly and nothing for any shares that answered incorrectly.

PredictIt is run by a non-profit and is a project of Victoria University in New Zealand. The goal is to learn more markets and decision-making. You can read more about the project here: https://www.predictit.org/About/WhatIsPredictIT

This project is not affiliated with predictit.org in any formal way, but we do utilize data provided by their public API: https://predictit.freshdesk.com/support/solutions/articles/12000001878-does-predictit-make-market-data-available-via-an-api-


**Project Purpose**

The goal of this project is to build tools to analyze the data of PredictIt markets. The tools provided on the PredictIt site are quite useful, but they do not let you view time intervals that are shorter than one hour. I built this project because I was curious to see how the markets varied on a short term basis.  Do predictable patterns emerge?

**Technologies**
- D3.js http://d3js.org
- php
- javascript
- data storage: json / tsv

**Currently in early beta**
- this project is still in development


**Getting started**
1. Unzip the package on your local or remote server
2. visit /predictit-tools/index.php in your browser and add "?ticker=" + TICKERSYMBOL
   e.g. "http://localhost/predictit-tools/index.php?ticker=CLINTON.NYPRMRY16.DEM"
3. A photo, question, and  should load, but it will take a few minutes before data begins to appear 
4. It is currently set up to gather data everyone 1 minute (60000 ms). 
5. It will automatically gather data in a folder for you: predictit-tools/data
6. The longer you keep the browser tab open, the more data it will collect (each minute)

See predictit-tools/screenshot.png for an example


**License**
MIT license: https://en.wikipedia.org/wiki/MIT_License
This software uses the PredictIt API, so you may also have to abide by their terms & conditions.



