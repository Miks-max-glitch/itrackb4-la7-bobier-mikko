Q1
You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.

Answer: 
The router looks at the URL path and its route parameters, not at the number of filters used. Since the second filter was handled using the existing route and its parameters, no new route was needed.

Q2
Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.

Answer:
If both filters were route parameters, the URL for year 4 only, with no course filter would need to include a value for the year and an empty or missing value for the course, such as /books/filter/4/ depending on how the route parameters were defined. This is because the router matches the URL structure and parameter positions.

Q3
Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.

Answer:
The detail page link needed a change because its URL pattern was different. The filter link did not need a change because it was already using the correct route pattern.

Q4
You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.

Answer:
The old filter method was used for the old filtering process, so I removed it because I no longer needed it. The store and update methods are for other actions, so I kept them even though they don't currently have a URL route.