<?php

namespace Tests;

use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_get_all_tasks(): void
    {
        $this->get('/api/v1/tasks');


        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' => [
                "code",
                "name",
                "is_closed"
            ],
        ]);
    }

    public function test_create_a_new_task()
    {
        $taskName = 'Some random task';

        $this->json('POST', '/api/v1/tasks', ['name' => $taskName])
            ->seeJson([
                'name' => $taskName,
                'is_closed' => false,
            ]);
    }
}
