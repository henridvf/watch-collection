<?php

require '../functions.php';
use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
    // Success tests
    public function test_getImagePath_empty_string()
    {
        // Arrange - Set up the test
        $expected = 'https://via.placeholder.com/250/FAFAD2';
        $input = '';

        // Act - Run the real function and pass in the input
        $case = getImagePath($input);

        // Assert - Compare the expected result to the actual result from
        //          running the function
        $this->assertEquals($expected, $case);
    }

    public function test_getImagePath_starts_with_http()
    {
        // Arrange - Set up the test
        $expected = 'https://somelink.com';
        $input = 'https://somelink.com';

        // Act - Run the real function and pass in the input
        $case = getImagePath($input);

        // Assert - Compare the expected result to the actual result from
        //          running the function
        $this->assertEquals($expected, $case);
    }

    public function test_getImagePath_image_file_name_not_empty_or_starts_with_http()
    {
        // Arrange - Set up the test
        $expected = 'images/my_test_image.jpg';
        $input = 'my_test_image.jpg';

        // Act - Run the real function and pass in the input
        $case = getImagePath($input);

        // Assert - Compare the expected result to the actual result from
        //          running the function
        $this->assertEquals($expected, $case);
    }

    public function test_createCollectionItem_create_complete_item_success()
    {
        // Arrange - Set up the test
        $expected = '<div class="collection_item"><img src="images/my_test_img.jpg" alt="Picture of a OMEGA watch" />';
        $expected .= '<h5>OMEGA</h5><p>OMEGA watch</p><hr><div class="split"><span><strong>Price</strong></span>';
        $expected .= '<span>£ 999</span></div><div class="split"><span><strong>Purchased</strong></span>';
        $expected .= '<span>2021-10-01</span></div><hr><p>No notes</p></div>';
        $input = ['name' => 'OMEGA watch',
            'brand_name' => 'OMEGA',
            'image' => 'my_test_img.jpg',
            'purchase_date' => '2021-10-01',
            'notes' => 'No notes',
            'price' => '999'];

        // Act - Run the real function and pass in the input
        $case = createCollectionItem($input);

        // Assert - Compare the expected result to the actual result from
        //          running the function
        $this->assertEquals($expected, $case);
    }

    public function test_createCollectionItem_create_empty_item_success()
    {
        // Arrange - Set up the test
        $expected = '<div class="collection_item"><img src="https://via.placeholder.com/250/FAFAD2" alt="Picture of a " />';
        $expected .= '<h5></h5><p></p><hr><div class="split"><span><strong>Price</strong></span>';
        $expected .= '<span>£ </span></div><div class="split"><span><strong>Purchased</strong></span>';
        $expected .= '<span></span></div><hr><p></p></div>';
        $input =
            ['name' => '',
            'brand_name' => '',
            'image' => '',
            'purchase_date' => '',
            'notes' => '',
            'price' => ''];

        // Act - Run the real function and pass in the input
        $case = createCollectionItem($input);

        // Assert - Compare the expected result to the actual result from
        //          running the function
        $this->assertEquals($expected, $case);
    }
}