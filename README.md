# silverstripe-testimonials
A FAQ module for silverstripe that implements the backend on any pagetype via an extension but does not dictate the frontend!

## How to use

### Install through composer
```bash
composer require webfox/silverstripe-testimonials
```

### Apply to any pagetype you want the "Faq Segments" tab to appear on
(can be applied to multiple page types)
```yaml
Page:
  extensions:
    - TestimonialsExtension
```

### Use on the frontend

```
<% if $testimonials.exists %>
    <% loop $testimonials %>
        <h2>Author: {$Title}</h2>
        <p>Company: {$Company}</p>
        <p>Date: {$Date}</p>
        <p>Testimonial:</p>
        {$Testimonial}
    <% end_loop %>
<% end_if %>
```
