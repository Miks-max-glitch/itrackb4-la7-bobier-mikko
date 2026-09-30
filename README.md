Q1. Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

Answer:
If the form used GET, all my book data (title, author, genre, everything) would get stuffed into the URL itself, like /books?title=TheLordofTheRings&author=Tolkien, instead of being sent quietly in the background. The real issue shows up when you hit refresh browsers treat GET as just "asking" for something, so it'll happily repeat that request over and over with zero warning, which means every refresh could silently add another book. POST is different because the browser knows it's an actual instruction, not a question, so it either warns you before resubmitting or, since I redirect after saving, there's nothing left to resubmit at all. Basically GET is fine for looking at stuff, but the moment you're actually changing data, you need POST or refreshing becomes a landmine.

Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

Answer:
When validate() hits a rule that fails, it doesn't return something I have to check — it stops the method right there by throwing an exception internally. Laravel catches that on its own and redirects the visitor back to the form, bringing the error messages and whatever they typed with it. So I never needed an if statement because the code after validate() just never runs at all when something's invalid. The visitor ends up right back on the same form, now showing what went wrong next to each field.

Q3. Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

Answer:
The layout checks for the success message on every page, but the message itself doesn't stick around — it's a flash value, so Laravel only keeps it alive for one request after I redirect. Right after saving, that request is the redirect to the list page, so it shows up there. But the moment I refresh or go to another page, Laravel's already deleted it from the session, so the check in the layout just finds nothing and shows nothing. The layout's always checking, it's just that the message itself disappears fast.