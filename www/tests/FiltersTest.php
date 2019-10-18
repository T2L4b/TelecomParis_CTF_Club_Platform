<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FiltersTest extends TestCase
{

    public function testCanBeUsedAsEmail(): void
    {
        $this->assertEquals(
            true,
            Filters::validateEmail('super.test@my-school.fr')
        );
        $this->assertEquals(
            true,
            Filters::validateEmail('supertest12@my-school.fr')
        );
        $this->assertEquals(
            true,
            Filters::validateEmail('super-test12@my-school.fr')
        );
        $this->assertEquals(
            true,
            Filters::validateEmail('sup@myschool.com')
        );
        $this->assertEquals(
            false,
            Filters::validateEmail('sup@my.school.com')
        );
        $this->assertEquals(
            false,
            Filters::validateEmail('123sup@my-school.com')
        );
    }

    public function testCanBeUsedAsPhone(): void
    {
        $this->assertEquals(
            true,
            Filters::validatePhoneNumber('+33612345678')
        );
        $this->assertEquals(
            true,
            Filters::validatePhoneNumber('0612345678')
        );
        $this->assertEquals(
            false,
            Filters::validatePhoneNumber('+33sdf612345678')
        );
        $this->assertEquals(
            false,
            Filters::validatePhoneNumber('061234567s8')
        );
        $this->assertEquals(
            false,
            Filters::validatePhoneNumber('+33612345678123')
        );
        $this->assertEquals(
            false,
            Filters::validatePhoneNumber('0612345672348')
        );
          $this->assertEquals(
            false,
            Filters::validatePhoneNumber('678123')
        );
        $this->assertEquals(
            false,
            Filters::validatePhoneNumber('34672348')
        );
    }

}