# Change Log
All notable changes to this project will be documented in this file.



## [1.0.2.4] - 07/08/2024

### Added
- Added New Generic Elements through `GenericElement.php` to enable developer to create more "composable" elements
- Added Element Factory
- Added support for conditional replacement
- Added an implementation of `Visitor Pattern` to render elements (incomplete)

### Fixed
- Fixed tests and coverage reports


## [1.0.2] - 03/03/2024

### Added
- Added more utility methods to `HtmlElement` and `AbstractInput` for easier manipulation of your code
- Added support for conditional rendering
- Added support for conditional replacement

### Changed
- Fixed the constructor for `Form` element
### Fixed


## [1.0.1] - 03/03/2024

### Added
- Added support for inline `HtmlElement` through using placeholders in the element's text and using `addInlineElement()` method
- Added `LineBreak` element
- Added the logic to set and manipulate classes

### Changed

### Fixed
- Removed `defaultId` as it did not make sense


## [1.0.0] - 01/03/2024

### Added
- Added more Elements

### Changed

- Hidden the `addElement()` method from non-container elements aka those element that are not supposed to have children

### Fixed


## [0.0.9] - 19/02/2024

### Added
- Initial release

### Changed

### Fixed