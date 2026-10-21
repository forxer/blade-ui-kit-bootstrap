# blade-ui-kit-bootstrap

- Blade components styled with Bootstrap 4/5 (forms, inputs, buttons, modals, alerts, badges); auto-handles CSRF, method spoofing, validation state and old values.
- SECURITY: content attributes (`title`, `text`, `confirm`, `startContent`, `endContent`, `content`) are rendered raw to allow HTML: escape untrusted data yourself, once, with `e()`, never `e(e())`. A hand-written `data-buk-confirm` is plain text: escape it with `{{ }}`.
- IMPORTANT: Activate `blade-ui-kit-bootstrap` skill for the component list, extension patterns, config keys and IDE metadata.
