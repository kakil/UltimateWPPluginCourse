# 1.   What is the problem I'm trying to solve?

I'd like to build an email list of subscribers on my website.  Currently there are lots of plugins that can do this that  require a third party service like MailChimp.  I don't want to have to rely on MailChimp.  The problem is there aren't any WordPress plugins, at least that I know of, that allow me to capture and store subscribers independent of a third party service.  I'd also like to reward subscribers with a reward when they opt-in, I can't find a plugin that does that.


# 2.  What is the solution?

The solution is a plugin that can capture new subscribers, independent of third party service like MailChimp, and reward those subscribers when they opt-in (confirm) their subscription.


# 3.  What will my plugin do?

## Features:

- Create unlimited email lists
- Capture subscribers with custom forms using a Shortcode
- Double opt-in for confirming subscriptions
- User unsubscribe feature with a subscriptions manager
- Reward subscribers with an exclusive download when they opt-in
- Easily export subscribers to a CSV
- Easily import subscribers from a CSV
- Automatically email subscribers when they sign up and opt-in


# 4.  How will I accomplish this?

## - Create unlimited email lists
>> USE CUSTOM POST TYPE AND ADVANCED CUSTOM FIELDS


## - Capture subscribers with custom forms using a Shortcode
>> CUSTOM POST TYPE FOR SUBSCRIBER, USE AJAX FORM HANDLER AND CREATE CUSTOM SHORTCODE FOR FORM


## - Double opt-in for confirming subscriptions
>> WP_MAIL TO SEND EMAILS, CUSTOM FUNCTION FOR GENERATING OPT-IN LINKS


## - User unsubscribe feature with a subscriptions manager
>> CUSTOM SHORTCODE AND AJAX FORM HANDLER


## - Reward subscribers with an exclusive download when they opt-in
>> USE ADVANCED CUSTOM FIELDS FILE FIELD, PHP HEADERS TO PUSH FILE AS ATTACHMENT, FUNCTION TO GENERATE CUSTOM LINK


## - Easily export subscribers to a CSV
>> RESEARCH PHP TO CSV


## - Easily import subscribers from a CSV
>> RESEARCH CSV TO PHP



## - Automatically email subscribers when they sign up and opt-in
>> WP_MAIL
 
 
 
# 5.  Describe the new plugin like you are going to market it:
 
The ultimate email list building plugin for WordPress.  Capture new subscribers.  Reward subscribers with a custom download upon opt-in.  Build unlimited lists.  Import and export subscribers easily with .csv
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
