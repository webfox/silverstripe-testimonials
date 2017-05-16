# silverstripe-testimonials
A FAQ module for silverstripe that implements the backend on any pagetype via an extension but does not dictate the frontend!

## How to use
This module supports installation via composer only:

```sh
composer require webfox/silverstripe-testimonials
```

### Apply to any PageType you want the "Testimonials" tab to appear on
(can be applied to multiple page types)
```yaml
Page:
  extensions:
    - TestimonialsExtension
```

### Use on the frontend

```
<% if $Testimonials %>
    <% loop $Testimonials %>
        <h2>Author: {$Title}</h2>
        <p>Company: {$Company}</p>
        <p>Date: {$Date}</p>
        <img src="{$Image.URL}" />
        <p>Testimonial:</p>
        {$Testimonial}
    <% end_loop %>
<% end_if %>
```
