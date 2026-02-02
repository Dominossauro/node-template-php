# node-template-php

Example template for creating custom nodes in Dominossauro using PHP.

## 📋 What is this project?

This is a template project that demonstrates how to create custom nodes for Dominossauro (a node-based automation system). It includes a complete configuration and implementation example.

## 🏗️ Project Structure

### 1. `composer.json`

The `composer.json` file contains two main parts:

#### **Composer Configuration**
```json
{
    "name": "dominossauro/app",
    "type": "vcs",
    "require": {
        "php": ">=8.0"
    }
}
```
- **name**: Package name in `vendor/package` format
- **type**: Defined as `vcs` (version control system)
- **require**: Project requirements (PHP 8.0 or higher)

#### **Dominossauro Configuration**

The `dominossauro.nodes` section is where you define custom nodes:

```json
"dominossauro": {
    "nodes": [...]
}
```

##### **Node Properties**

- **name**: `"NodeTest"` - Unique node identifier
- **nodeClass**: `"Test"` - Name of the class that implements the logic
- **label**: `"Node Test"` - Name displayed in the interface
- **description**: Description of what the node does
- **color**: `"#FF5733"` - Node color in the interface (hexadecimal)
- **icon**: `"🛠️"` - Emoji or node icon
- **file**: Path to the PHP file containing the class

##### **Outputs**

Defines which outputs the node can produce:

```json
"outputs": [
    {
        "name": "output1",
        "description": "Output variable 1",
        "type": "string"
    }
]
```

- **name**: Output variable name
- **description**: Description of what is returned
- **type**: Data type (`string`, `number`, `boolean`, etc.)

##### **Inputs**

Defines which inputs the node accepts:

```json
"inputs": [
    {
        "name": "input1",
        "classNodeMethod": "testMethod",
        "description": "Input variable 1",
        "type": "string"
    }
]
```

- **name**: Input variable name
- **classNodeMethod**: Class method that will be executed when this input is triggered
- **description**: Description of what the input expects
- **type**: Expected data type

##### **Modal (Settings)**

Defines the node configuration interface:

```json
"modal": {
    "title": "Custom Node 1 Settings",
    "description": "Configure the settings for Custom Node 1.",
    "fields": [
        {
            "label": "Setting 1",
            "type": "textarea",
            "default": "default value",
            "description": "This is setting 1.",
            "variableName": "setting1",
            "autoComplete": true
        }
    ]
}
```

- **title**: Configuration window title
- **description**: Settings description
- **fields**: Array of configuration fields
  - **label**: Field text
  - **type**: Input type (`textarea`, `text`, `number`, etc.)
  - **default**: Default value
  - **variableName**: Name of the variable that will store the value
  - **autoComplete**: Whether it should have autocomplete

### 2. `src/NodeTest.php`

File containing the node implementation.

#### **Output Enum**

```php
enum OutputNodeTest: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
}
```

Defines the possible node outputs. Use enums for type-safety and autocomplete.

#### **Node Class**

```php
class CustomNodeTest {
  public function testMethod(array $config, array $context): ?array {
    // your logic here
    
    return [
      'output' => OutputNodeTest::SUCCESS->value,
      'data' => [
        'message' => 'This is a test message.'
      ]
    ];
  }
}
```

##### **Method Parameters**

- **$config**: Array containing the settings defined in the modal (e.g., `$config['setting1']`)
- **$context**: Array with the workflow execution context

##### **Return**

The method should return an array with:
- **output**: Name of the output that was triggered (use the enum)
- **data**: Data that will be passed to the next node

Return `null` if you don't want to trigger any output.

## 🚀 How to Use This Template

1. **Clone the template**
   ```bash
   git clone <your-repository>
   ```

2. **Customize the `composer.json`**
   - Change the `name` to your vendor/package
   - Modify the node properties (name, label, description, color, icon)
   - Configure inputs, outputs, and modal according to your needs

3. **Implement the logic in the PHP file**
   - Create your output enum
   - Implement the class with the methods referenced in the inputs
   - Process the data from `$config` and `$context`
   - Return the appropriate output

4. **Test the node in Dominossauro**
   - Install the package in Dominossauro
   - The node will appear available in the palette
   - Connect it to other nodes and test the workflow

## 📝 Usage Example

This template comes with a functional example:
- **Node**: NodeTest
- **Input**: input1 (triggers testMethod)
- **Output**: output1 (returns success or error)
- **Configuration**: A text field (setting1)

You can use it as a base and modify it according to your needs.

## 🔧 Requirements

- PHP >= 8.0
- Dominossauro installed

## 📄 License

This is an example template for Dominossauro.