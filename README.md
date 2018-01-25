## Installation
Installation with composer

	"ryorky1/luhn": "dev-master"

## Usage
Use the class like this:

	$luhn = new \Rhino\Luhn\Luhn('79927398713');
	$luhn->validLuhn();
	
## Results
    The above usage will return either true(if passing) or false(if failing)
